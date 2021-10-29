<template>
    <div id="categoryList">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Post List</h3>
                <router-link tag='a' :to="{    name:'adminPostAdd'}" class="btn btn-success float-right">Add Post</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <!-- {{ getAllPost }} -->
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Category Name</th>
                    <th>User name</th>
                    <th>Post title</th>
                    <th>Post Descrition</th>
                    <th>image</th>
                    <th>Action</th></th>
                  </tr>
                  </thead>
                  <tbody>

                      <tr  v-for="(value,key) in getAllPost" :key="key" >
                          <td>{{key+1}}</td>
                          <td>{{value.category != null ? value.category.cat_name: ""}}</td>
                          <td>{{value.user != null ? value.user.name  : "" | toUpperCase}}</td>
                          <td>{{value.title}}</td>
                          <td>{{value.description  | textLength(150,'.....') }}</td>
                          <td>
                              <img :src="postImage(value.photo)" alt="" class="img-fluid">
                          </td>
                          <td>
                              <router-link tag="a" :to="{ name:'adminPostedit', params:{id:value.id} }" class="btn btn-success">Edit</router-link>
                              <a href="javascript:void(0);" @click.prevent="postDelete(value.id)" class="btn btn-danger">Delete</a>
                          </td>
                      </tr>
                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->
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
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

export default {
    data(){
        return {

        }
    },
    mounted() {
        this.$store.dispatch('getAllPostAction');
    },
    created() {},
    computed:{
        getAllPost(){
            return this.$store.getters.getAllPostGetters;
        }
    },
    methods: {
        postImage(image){
             let str1 = image;
            if(str1.indexOf('data') != -1){
                return image;
                // console.log(str2 + " found");
            }else{
              return   'assets/images/'+image;
            }
        },
        postDelete(id){
           Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                axios.get(`/post-delete/${id}`)
                .then((reflection)=>{
                    if(reflection.data.status == 'success'){
                         Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            )
                             this.$store.dispatch('getAllPostAction');
                    }
                    // console.log(reflection.data.status);
                }).catch((data)=>{
                    console.log('reflection error');
                });

            }
            })
        }
    }

}
</script>
