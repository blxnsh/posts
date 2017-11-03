<template>
    <div class="row">
      <hr>
        <div class="col-md-8 col-md-offset-2">
          <!-- COMMENT FORM -->
          <postform @doAddPost="addPost" :postForm="post"></postform>
          <!-- All posts -->
          <post v-for="(post,index) in posts"
          :post="post"
          :key="index"
          ></post>

        </div>
      <hr>
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
          posts: [],
          post: {
            title:'',
            body:''
          }
        };
      },
      mounted() {
        axios.get('/api/getPosts')
          .then(response => this.posts = response.data.reverse());
      },
      methods: {
        addPost(post) {
          post.post('/api/createPost')
            .then(response => this.posts.unshift(response));
        }
      }

    }
</script>
