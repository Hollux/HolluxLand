let message = {
    delimiters: ['$$', '$$'],
    props: {
        type: {type: String, default: 'success'},
        message: String,
        header: String
    },
    template: `<div class="ui message" :class="type">
                    <i class="close icon" @click="close"></i>
                    <div class="header">$$ header $$</div>
                    $$ message $$
                 </div> `,
    methods: {
        close() {
            this.$emit('close', )
        }
    }
}

let counter = {
    delimiters: ['$$', '$$'],
    data: function () {
        return {count: 0}
    },
    props: {
        start: {type: Number, default: 0}
    },
    computed: {
        total: function () {
            return this.start + this.count
        }
    },
    methods: {
        increment: function () {
            this.count++
        }
    },
    template: `<button @click="increment">$$ total $$</button>`,
}

let vm = new Vue({
    delimiters: ['$$', '$$'],
    el: '#vue1',
    components: {message, counter},
    data: {
        message: "un meilleur texte",
        alert: false
    },
    methods: {
        showAlert () {
            this.alert = true
        }
    }
});

new Vue({
    delimiters: ['<$', '$>'],
    el: '#vue2',
    data: {
        message: "pas toto 2"
    }
});

