<template>
    <div class="w-25">
        <SomeComponent :obj="obj"></SomeComponent>
        <div class="mb-3">
            <input type="text" v-model="name" class="form-control" id="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number"  v-model="age" class="form-control" id="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" v-model="job" class="form-control" id="job" placeholder="job">
        </div>
        <div class="mb-3">
            <input @click.prevent="addPerson" type="submit" class="btn btn-primary" value="Добавить" >
        </div>
    </div>
</template>

<script>
    // import SinglePostComponent from './SinglePostComponent.vue';
    import SomeComponent from './SomeComponent.vue';
    export default {
        name: "CreateComponent",
        // data:function(){
        //     return{
        //         name: "Vasua",
        //     }

        // },
        data(){
            return{
                name:null,
                age:null,
                job:null,
                obj:{
                    color:"green"
                }
            }
        },
        components:{
            SomeComponent
        },
        mounted() {
            // this.getPosts()
            // console.log(this.$parent.$refs.index.indexLof());
        },
        methods:{
            addPerson(){
                const data = { name: this.name,  age:this.age, job:this.job };
                const article = { title: "Vue POST Request Example" };
                axios.post('/api/people/', data)
                .then(res => {
                    this.name = null;
                    this.age = null;
                    this.job = null;
                    this.$parent.$refs.index.getPeople()

                })
                // .then(response => this.articleId = response.data.id)
                .catch(error => {
                this.errorMessage = error.message;
                    console.error(error.message);
                });
            },
        },
    }
</script>
