  //vuex install
  import Vue from 'vue'
  import Vuex from 'vuex'

  Vue.use(Vuex)


export const store = new Vuex.Store({
    state: {
        categories:[],
    },
    getters:{
        getAllCategorGetters(state){
            return state.categories;
        }
    },
    mutations: {
        getAllCategoryMutation(state,data){
           return state.categories = data;
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
        }
    }
  })
