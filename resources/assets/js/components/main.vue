<template>
  <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <hr>
              <!-- Open/Close Post form -->
              <p>
                <button class="btn btn-primary" @click="showForm > 0? showForm = 0: showForm = 1">
                  {{showForm > 0 ? 'Скрыть' : 'Добавить пост'}}
                </button>
              </p>
              <postform @doAddPost="addPost" :postForm="post" v-if="showForm"></postform>
              <!-- All posts -->
                  <post v-for="(post,index) in posts"
                  :post="post"
                  :key="index"
                  @updatePost="updatePost"
                  @deletePost="deletePost"
                  ></post>

            </div>
        </div>
  </div>
</template>

<script>
import post from './post';
import postform from './postform';
    export default {
      components: {
        post,
        postform
      },
      data(){
        return {
          showForm: 0,
          posts: [],
          post: {
            title:'',
            body:'',
            id:''
          }
        };
      },
      mounted() {
        axios.get('/api/getPosts')
          .then(response => this.posts = response.data.reverse());
      },
      methods: {
        addPost(post) {
          if(post.id == '')
          {
            post.post('/api/createPost')
              .then(response => this.posts.unshift(response));
          } else {
            post.put('/api/updatePost')
              .then(response => {this.posts[this.posts.findIndex(i => i.id == response.id)].title = response.title;
                                this.posts[this.posts.findIndex(i => i.id == response.id)].body = response.body;});
          }
          this.showForm = 0;
          this.post = {
                        title:'',
                        body:'',
                        id:''
                      }
        },
        updatePost(value){
          this.showForm = 0;
          this.showForm = 1;
          this.post = value;
        },
        deletePost(post){
          axios.delete('/api/deletePost', {params: {id: post.id}})
                .then(this.posts.splice(this.posts.findIndex(i => i.id == post.id), 1));
        }
      }

    }
</script>
