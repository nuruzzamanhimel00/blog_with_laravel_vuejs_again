<template>
    <div id="categoryList">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">Categor Add</h3>

              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row justify-content-center">
                      <div class="col-md-8 ">
                           <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Post </h3>
                                   --- {{ $route.params.id }}
                                </div>

                                <form @submit.prevent="postUpdate" @keydown="form.onKeydown($event)">

                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="titleid">Post Title</label>
                                            <input type="text" v-model="form.title" name="title" class="form-control" id="titleid" placeholder="Enter Post title ">
                                             <div v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                                        </div>

                                        <div class="form-group">
                                            <label for="descriptionid">Post Description</label>
                                            <textarea  class="form-control" name="description" v-model="form.description" id="descriptionid" cols="30" rows="10"></textarea>

                                             <div v-if="form.errors.has('description')" v-html="form.errors.get('description')" />
                                        </div>
                                     <!-- {{ allCategory }} -->
                                       <div class="form-group">
                                            <label for="cat_id">Post Category</label>
                                            <select class="form-control" v-model="form.cat_id" name="cat_id" id="cat_id">
                                                <option disabled  selected value="" >Select Category</option>

                                                <option v-for="(value, key) in allCategory" :key="key" :value="value.id">
                                                    {{  value.cat_name }}
                                                </option>
                                            </select>
                                            <div v-if="form.errors.has('cat_id')" v-html="form.errors.get('cat_id')" />
                                        </div>

                                         <div class="form-group">
                                            <label for="photoid">Post Photo</label>
                                            <input type="file" @change.prevent="changeImage($event)" name="photo" class="form-control" id="photoid" placeholder="Enter photo">
                                            <img :src="postImage()" alt="" width="400" height="400">
                                             <div v-if="form.errors.has('photo')" v-html="form.errors.get('photo')" />
                                        </div>

                                        <div class="form-group">
                                            <label for="user_id">User</label>
                                            <select class="form-control" v-model="form.user_id" name="user_id" id="user_id">
                                                <option disabled  selected value="" >Select User</option>

                                                <option v-for="(value,key) in allUsers" :key="key" :value="value.id">
                                                        {{ value.name }}
                                                </option>
                                            </select>
                                            <div v-if="form.errors.has('user_id')" v-html="form.errors.get('user_id')" />
                                        </div>

                                    </div> <!-- card-body -->



                                    <div class="card-footer">
                                    <button type="submit" :disabled="form.busy" class="btn btn-primary">Update</button>
                                    </div>
                                </form>


                            </div>
                      </div>
                  </div>

              </div>

            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    </div>
</template>

<script>
//install vform
import Form from 'vform'
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

export default {
    data(){
        return {
             form: new Form({
                cat_id: '',
                user_id: '',
                title: '',
                description: '',
                photo: '',
                }),
                id: this.$route.params.id
        }
    },
    mounted(){
        this.$store.dispatch('getAllCategoryAction');
        this.$store.dispatch('getAllUserAction');

    },
    created(){
        axios.get(`/postByid/${this.id}`)
        .then((reflection)=>{
            this.form.fill(reflection.data.posts);
            // console.log(reflection.data);
        }).catch((data)=>{
            aler('server reflection error');
        });
    },
    computed: {
        allCategory(){
            return this.$store.getters.getAllCategorGetters;
        },
        allUsers(){
            return this.$store.getters.getAllUsersGetters;
        }
    },
    methods: {
        changeImage(event){
            let file = event.target.files[0];

             const reader = new FileReader();
            reader.onload = (event)=> {
                this.form.photo = event.target.result;
                // console.log(event.target.result);
            };
            reader.readAsDataURL(file);

            // console.log( event.target.files);
        },
        postImage(){
            let str1 = this.form.photo;
            if(str1.indexOf('data') != -1){
                return this.form.photo;
                // console.log(str2 + " found");
            }else{
              return   'assets/images/'+this.form.photo;
            }
            // return this.form.photo;
        },
        async postUpdate () {
            //  alert('form submit');
            const response = await this.form.post(`/update-post/${this.id}`)
            .then((reflection)=>{
                console.log(reflection);
                if(reflection.data.status == 'success'){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                        })

                        Toast.fire({
                        icon: 'success',
                        title: "Post Update Successfully"
                        });

                        this.$router.push({ name:'adminPostlist'});
                }

            }).catch((error)=>{
                // alert('server error');
                console.log(error);
            });
            // // ...
            }
    }
}
</script>
