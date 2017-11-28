<?php

/*
 * This file is part of the AlcyonCoreBundle package.
 *
 * (c) David DE SOUSA <d.desousa@alcyon.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ListHelperBundle\Component\Filter;

use ListHelperBundle\Component\Exception\UnexpectedTypeException;
use ListHelperBundle\Component\FilterInterface;
use ListHelperBundle\Component\Transformer\StringTransformer;
use ListHelperBundle\Component\TransformerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractFilter implements FilterInterface
{
    /**
     * @var array
     */
    private $options;

    /**
     * @var Form
     */
    private $type;

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        if(null == $this->options) {
            $this->setOptions();
        }

        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options = [])
    {
        $resolver = new OptionsResolver();
       
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        // Set default        
        $resolver->setDefaults([
            'type' => null,
            'type_options' => ['required' => false],
            'transformer' => null,
        ]);

        $resolver->setRequired('field');

        $resolver->setAllowedTypes('field', ['string'])
            ->setAllowedTypes('type', ['null', 'string'])
            ->setAllowedTypes('type_options', 'array')
            ->setAllowedTypes('transformer', ['null', 'array', 'string']);

        $resolver
            ->setNormalizer('transformer', function (Options $options, $data)  {
                return $this->standardNormalizer($options, $data, ['field'], StringTransformer::class, TransformerInterface::class);
            });
    }

    public function standardNormalizer(Options $options, $data, $optionToAdd, $defaultDataClass, $dataInstance)
    {
        $optionsData = [];

        // In $data is array, convert to $optionsData
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                if (is_string($value) && in_array($dataInstance, class_implements($value))) {
                    $data = $value;
                } else {
                    $optionsData[$key] = $value;
                }
            }

            // $data already array, convert in standard class
            if (is_array($data))
                $data = $defaultDataClass;
        }

        // Add extra options to $optionsData
        foreach ($optionToAdd as $key) {
            if (!isset($optionsData[$key])) {
                $optionsData[$key] = $options[$key];
            }
        }

        // If $data is not null
        if (null !== $data) {
            // verify in implement $dataInstance
            if(!is_string($data) || !in_array($dataInstance, class_implements($data))) {
                throw new UnexpectedTypeException($data, 'string, array or ' . $dataInstance);
            }else {
                // Create Object
                $data = new $data();
                $data->setOptions($optionsData);
            }
        }

        return $data;
    }

    /**
     * Get transformer of this Filter
     *
     * @return TransformerInterface|null
     */
    protected function getTransformer()
    {
        return ($this->getOptions()) ['transformer'];
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function addToForm($name, FormInterface $form)
    {
        $options = $this->getOptions();

        if (null !== $options['type']) {
            $form->add($name, $options['type'], $options['type_options']);

            $this->type = $form->get($name);
        }
    }
}