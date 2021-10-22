import compAdminHome from './components/admin/adminHome'
import compExp from './components/ExampleComponent.vue'

export const routes = [
    {
        path:'/admin',
        component: compAdminHome,
        name:'adminHome'
    },
    {
        path:'/posts',
        component: compExp,
        name:'example'
    }
]
