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
                        <router-link  :to="{   name:'publiccompPostByCat', params:{id:value.id} }"

                        >{{value.cat_name}}</router-link>
                        <span> ({{ value.posts_count }}) </span>

                    </li>

                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">

                  <li  v-for="(value,key) in getSidebarLatestPost" :key="key" v-if="key<5" >
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

        this.sidebarLatestPost();
    },
    computed:{
        getAllCategory(){
            return this.$store.getters.getAllCategorGetters;
        },
        getSidebarLatestPost(){
            return this.$store.getters.publicSidebarLatestPostGetters;
        }
    },
    methods:{
        allCategoryMethod(){
             this.$store.dispatch('publicGetAllCategoryAction');

        },

        sidebarLatestPost(){
              this.$store.dispatch('publicSidebarLatestPostAction');
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
