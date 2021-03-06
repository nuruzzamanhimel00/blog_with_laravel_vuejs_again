import compAdminHome from './components/admin/adminHome'
import compCategoryList from './components/admin/category/categoryList.vue'
import compCategoryAdd from './components/admin/category/categoryAdd.vue'
import compCategoryEdit from './components/admin/category/categoryEdit.vue'
//post
import compPostlist from './components/admin/post/postList.vue'
import compPostEdit from './components/admin/post/postEdit.vue'
import compPostadd from './components/admin/post/postAdd.vue'
// fontend
import compHome from './components/public/home.vue'
import compBlogpost from './components/public/blog/blogPost.vue'
import cimpSinglepost from './components/public/blog/blogSInglepost.vue'
import compPostByCat from './components/public/blog/blogPostWithCategory.vue'

export const routes = [
    {
        path:'/admin',
        component: compAdminHome,
        name:'adminHome'
    },
    {
        path:'/category-list',
        component: compCategoryList,
        name:'adminCategoryList'
    },
    {
        path:'/category-add',
        component: compCategoryAdd,
        name:'adminCategoryAdd'
    },
    {
        path:'/category-edit/:id',
        component: compCategoryEdit,
        name:'adminCategoryEdit'
    },
    {
        path:'/post-list',
        component: compPostlist,
        name:'adminPostlist'
    },
    {
        path:'/post-edit/:id',
        component: compPostEdit,
        name:'adminPostedit'
    },
    {
        path:'/post-add',
        component: compPostadd,
        name:'adminPostAdd'
    },
    // fontend

    {
        path:'/',
        component: compHome,
        name:'publicHome'
    },
    {
        path:'/posts',
        component: compBlogpost,
        name:'publicBlogpost'
    },
    {
        path:'/post/:id',
        component: cimpSinglepost,
        name:'publicBlogSinglepost'
    },
    {
        path:'/postByCat/:id',
        component: compPostByCat,
        name:'publiccompPostByCat'
    },



]
