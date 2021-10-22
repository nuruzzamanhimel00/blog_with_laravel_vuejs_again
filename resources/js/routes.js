import compAdminHome from './components/admin/adminHome'
import compCategoryList from './components/admin/category/categoryList.vue'
import compCategoryAdd from './components/admin/category/categoryAdd.vue'

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
    }
]
