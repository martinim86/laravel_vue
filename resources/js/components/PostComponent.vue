<template>
    <div class="container">

        <CreateComponent></CreateComponent>
        <IndexComponent ref="index"></IndexComponent>
<!--        <div>{{ name }}</div>-->
<!--        <table class="table">-->
<!--            <thead>-->
<!--                <tr>-->
<!--                <th scope="col">id</th>-->
<!--                <th scope="col">name</th>-->
<!--                <th scope="col">age</th>-->
<!--                <th scope="col">hi</th>-->
<!--                <th scope="col">Edit</th>-->
<!--                </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--                <template v-for="person in persons">-->
<!--                    <tr>-->
<!--                        <th scope="row"> {{person.id}}</th>-->
<!--                        <td> {{person.name}}</td>-->
<!--                        <td>{{person.age}}</td>-->
<!--                        <td>@ {{person.hi}}</td>-->
<!--                        <td><a href="#" @click.prevent = "changeEditPersonId(person.id,person.name,person.age,person.hi)"  class="btn btn-success">Edit</a></td>-->
<!--                    </tr>-->
<!--                    <tr :class="isEdit(person.id)?'':'d-none'" >-->
<!--                        <th scope="row"> {{person.id}}</th>-->
<!--                        <td><input type="text" v-model="name" class="form-control"></td>-->
<!--                        <td><input type="number" v-model="age" class="form-control"></td>-->
<!--                        <td><input type="text" v-model="hi" class="form-control"></td>-->
<!--                        <td><a href="#" @click.prevent = "uodatePosts(person.id)" class="btn btn-success">Update</a></td>-->
<!--                    </tr>-->
<!--                </template>-->
<!--                -->
<!--            </tbody>-->
<!--        </table>-->




        <!-- <div>job {{ vasjod }}</div> -->
        <button type="button" @click="sayHallo"></button>
    </div>
</template>

<script>

    import CreateComponent from './CreateComponent.vue';
    import IndexComponent from './IndexComponent.vue';
    export default {
        name: "PostComponent",
        // data:function(){
        //     return{
        //         name: "Vasua",
        //     }

        // },
        data(){
            return{
                persons: null,
                editPersonId : null,
                name: null,
                age:null,
                hi:null,
            }
        },
        components:{ CreateComponent,IndexComponent},
        mounted() {
            // this.getPosts()
            // console.log(this.$refs.index.indexLof());
        },
        methods:{
            parentLog(){
                console.log('this is parent component');
            },
            // getPosts(){
            //
            //     axios.get('/posts')
            //     .then(data =>{
            //         // console.log(data)
            //         this.persons = data.data
            //         this.name = 5
            //     })
            // },
            uodatePosts(id){
                this.editPersonId = null,

                axios.patch(`/api/people/${id}`,  { name:this.name, age:this.age, hi:this.hi })
                .then(res =>{

                    // this.persons = data.data
                    // this.name = 5
                })
            },
            changeEditPersonId(id, name,age, hi){
                // console.log(id);
                this.editPersonId = id,
                this.name = name
                this.age = age
                this.hi = hi
            },
            isEdit(id){
                return this.editPersonId === id
            }

        },
        // computed:{

        // },

    }
</script>
