<template>
    <div id="categoryList">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categor List</h3>
                <router-link tag='a' :to="{    name:'adminCategoryAdd'}" class="btn btn-success float-right">Add Category</router-link>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <!-- {{ getAllCategory }} -->
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>NO</th>
                    <th>Category Name</th>
                    <th>Created At</th>

                    <th>Action</th></th>
                  </tr>
                  </thead>
                  <tbody>

                 <tr v-for="(value , key)  in getAllCategory " :key="key"  >
                    <td>{{key+1}}</td>
                    <td>{{value.cat_name | toUpperCase}}</td>
                    <td>{{value.created_at | dateTimeFormate}}</td>
                    <td>
                        <router-link tag="a"
                        :to="{ name:'adminCategoryEdit', params:{id:value.id} }"
                         class="btn btn-success">Edit
                         </router-link>
                        <a  @click.prevent="deleteCategory(value.id)" class="btn btn-danger">Delete</a>
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
        this.$store.dispatch('getAllCategoryAction');
    },
    created() {},
    computed:{
        getAllCategory(){
            return this.$store.getters.getAllCategorGetters;
        }
    },
    methods: {
        deleteCategory(id){
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
                     axios.get(`/delete-category/${id}`)
                .then((reflection)=>{
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

                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )

                                    this.$store.dispatch('getAllCategoryAction');
                            }
                        });

                    }
                })


            // alert(id);
        }
    }

}
</script>
