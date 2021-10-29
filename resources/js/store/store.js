  //vuex install
  import Vue from 'vue'
  import Vuex from 'vuex'

  Vue.use(Vuex)


export const store = new Vuex.Store({
    state: {
        categories:[],
        posts:[],
        users:[],
    },
    getters:{
        getAllCategorGetters(state){
            return state.categories;
        },
        getAllPostGetters(state){
            return state.posts;
        },
        getAllUsersGetters(state){
            return state.users;
        }
    },
    mutations: {
        getAllCategoryMutation(state,data){
           return state.categories = data;
        },
        getAllPostMutation(state,data){
            state.posts = data;
            // console.log(data);
        },
        getAllUserMutation(state,data){
            state.users = data;
        }
    },
    actions: {
        getAllCategoryAction(context){
            axios.get('/get-all-category')
            .then((reflection)=>{
                context.commit('getAllCategoryMutation',reflection.data.category);
                // console.log(reflection.data);
            }).catch((error)=>{
                alert('server errors');
            });
        },
        getAllPostAction(context){
            axios.get('/all-post')
            .then((reflection)=>{
                context.commit('getAllPostMutation',reflection.data.posts);
            });
        },
        getAllUserAction(context){
            axios.get('/get-all-users')
            .then((reflection)=>{
                context.commit('getAllUserMutation',reflection.data.users);
                // console.log(reflection.data.users);
            });
        }
    }
  })
