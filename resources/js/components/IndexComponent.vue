<template>
    <div >
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Job</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
                <template v-for="person in people">
                    <ShowComponent :person="person" :ref="`show${person.id}`"></ShowComponent>
                    <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>

                </template>
            </tbody>
        </table>

    </div>
</template>

<script>
    import EditComponent from './EditComponent.vue';
    import ShowComponent from './ShowComponent.vue';
    export default {
        name: "IndexComponent",
        // data:function(){
        //     return{
        //         name: "Vasua",
        //     }

        // },
        data(){
            return{
                people:null,
                editPersonId : null,
                name: null,
                age:null,
                job:null,
            }
        },
        components:{EditComponent, ShowComponent},
        mounted() {
            this.getPeople()
            // console.log(this.$parent.parentLog());
        },
        methods:{
            getPeople(){
                axios.get('/api/people/')
                .then(res => {
                    this.people = res.data;
                })
            },
            changeEditPersonId(id, name,age, job){
                this.editPersonId = id
                let editName = `edit_${id}`
                console.log(editName);
                let fullEditName = this.$refs[editName][0];
                fullEditName.name = name
                fullEditName.age = age
                fullEditName.job = job
            },
            isEdit(id){
                return this.editPersonId === id
            },
            updatePerson(id){
                this.editPersonId = null,
                axios.patch(`/api/people/${id}`,  { name:this.name, age:this.age, job:this.job })
                .then(res =>{
                    this.getPeople()
                })
            },
            deletePerson(id){
                axios.delete(`/api/people/${id}`)
                .then(res =>{
                    this.getPeople()
                })
            },
            indexLof(){
                console.log('this is index component');
            }


        },
        // computed:{

        // },

    }
</script>
