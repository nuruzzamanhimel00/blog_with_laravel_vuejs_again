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
                                    <h3 class="card-title">Add Category </h3>
                                </div>

                                <form @submit.prevent="categorySubmit" @keydown="form.onKeydown($event)">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="catnameid">Category Name</label>
                                            <input type="text" v-model="form.cat_name" class="form-control" id="catnameid" placeholder="Enter category name">
                                             <div v-if="form.errors.has('cat_name')" v-html="form.errors.get('cat_name')" />
                                        </div>

                                    </div>


                                    <div class="card-footer">
                                    <button type="submit" :disabled="form.busy" class="btn btn-primary">Submit</button>
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
                cat_name: '',

                })
        }
    },
    methods: {
         async categorySubmit () {
            //  alert('form submit');
            const response = await this.form.post('/add-catoegy')
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
                        title: reflection.data.message
                        });

                        this.$router.push({ name:'adminCategoryList'});
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
