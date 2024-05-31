<template>
    <div class="w-25">
        <div>Color:{{ obj.color }}</div>
    </div>
</template>

<script>
    import SinglePostComponent from './SinglePostComponent.vue';
    export default {
        name: "SomeComponent",
        // data:function(){
        //     return{
        //         name: "Vasua",
        //     }

        // },
        props:[
            'obj'
        ],
        data() {
            return {}
        },
        // components:{SomeComponent},
        mounted() {
            console.log(this.$parent.$parent.parentLog());
        },
        methods: {

        }
    }
</script>
