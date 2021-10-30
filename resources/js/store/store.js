  //vuex install
  import Vue from 'vue'
  import Vuex from 'vuex'

  Vue.use(Vuex)


export const store = new Vuex.Store({
    state: {
        categories:[],
        posts:[],
        users:[],
        singlePost:[],
        postCatId:[],
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
        },
        getSInglePostByIdGetters(state){
            return state.singlePost;
        },
        getPostByCatidGetters(state){
            return state.postCatId;
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
        },
        getSInglePostByIdMutation(state,data){
            state.singlePost = data;
        },
        getPostByCatidMutation(state,data){
            state.postCatId = data;
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
        },
        getSInglePostByIdAction(context,id){
            axios.get(`getSinglePostByid/${id}`)
            .then((reflection)=>{
                context.commit('getSInglePostByIdMutation',reflection.data.post);
                // console.log(reflection.data.post);
            }).catch(()=>{
                alert('server reflction error');
            });
        },
        publicGetAllPostAction(context){
            axios.get('/public-all-post')
            .then((reflection)=>{
                context.commit('getAllPostMutation',reflection.data.posts);
            });
        },
        publicGetAllCategoryAction(context){
            axios.get('/public-get-all-category')
            .then((reflection)=>{
                context.commit('getAllCategoryMutation',reflection.data.category);
                // console.log(reflection.data.category);
            });
        },
        getPostByCatidAction(context,id){
            axios.get(`/public-get-post-catid/${id}`)
            .then((reflection)=>{
                context.commit('getPostByCatidMutation',reflection.data.posts);
                // console.log(reflection.data.category);
            });
            // alert(id);
        }
    }
  })
