<template lang="html">
  <!-- Single Post component -->
  <div class="container">
    <hr>
    <!-- Post -->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <p>
          <router-link :to="{name: 'main'}">
            <button class="btn btn-primary">
              Назад
            </button>
          </router-link>
        </p>
        <div class="panel panel-default">
          <div class="panel-heading">{{post.title}}</div>
          <div class="panel-body" v-html="post.body"></div>
        </div>
      </div>
    </div>
    <!-- Comments section -->
    <div class="row">
      <hr>
      <div class="col-md-8 col-md-offset-2">
        <h2>Коментарии:</h2>
        <comment
        v-for="(comment,index) in comments"
        :comment="comment"
        :key="index"
        >
        </comment>
        <h3>Оставить коментарий</h3>
        <commentform
        @addComment="addComment"
        :posts_id="$route.params.id"
        ></commentform>
      </div>
    </div>
    <hr>
  </div>
</template>

<script>
import comment from './comment';
import commentform from './commentform';
export default {
  components: {
    comment,
    commentform
  },
  data(){
    return {
      post:'',
      comments:[]
    };
  },
  mounted() {
    axios.get('/api/getOnePost', { params: {id: this.$route.params.id} })
      .then(response => this.post = response.data);
    axios.get('/api/getComments', { params: {id: this.$route.params.id} })
      .then(response => this.comments = response.data);
  },
  methods: {
    addComment(value) {
      value.post('/api/createComment')
        .then(response => this.comments.push(response));
    }
  }
}
</script>

<style lang="css">
</style>
