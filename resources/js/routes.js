import compAdminHome from './components/admin/adminHome'
import compCategoryList from './components/admin/category/categoryList.vue'
import compCategoryAdd from './components/admin/category/categoryAdd.vue'
import compCategoryEdit from './components/admin/category/categoryEdit.vue'

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
    }
]
