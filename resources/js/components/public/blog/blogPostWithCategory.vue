<template>
    <span id="blogPosts">
         <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>Category Wise Post</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog with left sidebar</li>
                    </ul>
                </div>
                </div>
            </div>
        </section>
        <section id="content">
        <div class="container">
            <div class="row">
            <div class="span8">
                <!-- {{ getPostCategoryId }} -->
                 <article v-for="(value,key) in getPostCategoryId" :key="key">
                <div class="row">
                    <div class="span8">
                    <div class="post-image">
                        <div class="post-heading">
                        <h3><a href="#">{{ value.title | toUpperCase }}</a></h3>
                        </div>
                        <img :src="postImage(value.photo)" alt="" style="width:100%;height:300px;" />
                    </div>
                    <p>
                      {{ value.description | textLength(200,'----') }}
                    </p>
                    <div class="bottom-article">
                        <ul class="meta-post">
                        <li><i class="icon-calendar"></i><a href="#">
                            {{ value.created_at | dateTimeFormateMMDDYY }}

                            </a></li>
                        <li><i class="icon-user"></i><a href="#">
                            {{ value.user != null ? value.user.name : "" }}
                            </a></li>
                        <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                        <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                        </ul>
                        <router-link tag="a" :to="{ name:'publicBlogSinglepost',  params:{id:value.id} }"  class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                    </div>
                    </div>
                </div>
                </article>




            </div>

            <!-- // ***************** Sidebar *********** -->
            <compBlogsidebar></compBlogsidebar>

            </div>
        </div>
        </section>
    </span>
</template>


<script>

import compBlogsidebar from './blogSidebar.vue'
export default {
    data(){
        return {

        }
    },
    mounted(){
        this.getPostByCatid();
    },
    watch:{
        $route(to,from){
            // alert('watch load');
           this.getPostByCatid();
        }
    },
    computed:{
        getPostCategoryId(){
           return  this.$store.getters.getPostByCatidGetters;
        }
    },
    methods:{
         postImage(image){
             let str1 = image;
            if(str1.indexOf('data') != -1){
                return image;
                // console.log(str2 + " found");
            }else{
              return   'assets/images/'+image;
            }
        },
        getPostByCatid(){
            // alert('singlePost');
             this.$store.dispatch('getPostByCatidAction',this.$route.params.id);
        }
    },
    components:{
        compBlogsidebar

    }
}
</script>
