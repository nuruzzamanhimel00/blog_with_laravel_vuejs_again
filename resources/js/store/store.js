  //vuex install
  import Vue from 'vue'
  import Vuex from 'vuex'

  Vue.use(Vuex)


export const store = new Vuex.Store({
    state: {
        categories:[],
        posts:[]
    },
    getters:{
        getAllCategorGetters(state){
            return state.categories;
        },
        getAllPostGetters(state){
            return state.posts;
        }
    },
    mutations: {
        getAllCategoryMutation(state,data){
           return state.categories = data;
        },
        getAllPostMutation(state,data){
            state.posts = data;
            // console.log(data);
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
        }
    }
  })
