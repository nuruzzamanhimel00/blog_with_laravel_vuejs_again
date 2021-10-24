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
                        <a href="" class="btn btn-danger">Delete</a>
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

    }

}
</script>
