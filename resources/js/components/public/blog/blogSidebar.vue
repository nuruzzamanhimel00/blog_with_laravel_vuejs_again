<template>
    <span id="blogSidebar">
<div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <!-- {{ getAllCategory }} -->
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                   <li  v-for="(value,key) in getAllCategory" :key="key" >
                      <i class="icon-angle-right"></i>
                        <a href="#">{{value.cat_name}}</a>
                        <span> ({{ value.posts_count }}) </span>

                    </li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li  v-for="(value,key) in getAllPosts" :key="key" v-if="key<5" >
                    <img :src=" postImage(value.photo)" class="pull-left img-fluid" alt="" width="50" style="height:50px;" />
                    <h6>
                        <router-link tag="a" :to="{ name:'publicBlogSinglepost',  params:{id:value.id} }" >{{ value.title | toUpperCase }}</router-link>

                    </h6>
                    <p>
                      {{ value.description | textLength(80,'----') }}
                    </p>
                  </li>

                </ul>
              </div>

            </aside>
          </div>

    </span>
</template>

<script>
export default {
    data(){
        return {

        }
    },
    mounted(){
        this.allCategoryMethod();
        this.allPostsMethod();
    },
    computed:{
        getAllCategory(){
            return this.$store.getters.getAllCategorGetters;
        },
        getAllPosts(){
            return this.$store.getters.getAllPostGetters;
        }
    },
    methods:{
        allCategoryMethod(){
             this.$store.dispatch('publicGetAllCategoryAction');

        },
        allPostsMethod(){
              this.$store.dispatch('publicGetAllPostAction');
        },
        postImage(image){
             let str1 = image;
            if(str1.indexOf('data') != -1){
                return image;
                // console.log(str2 + " found");
            }else{
              return   'assets/images/'+image;
            }
        },
    }
}
</script>
