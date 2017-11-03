<template lang="html">
  <!-- Single Post component -->
  <div class="container">
    <div class="row">
      <hr>
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
          <div class="panel-body">{{post.body}}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      post:''
    };
  },
  mounted() {
    axios.get('/api/getOnePost', { params: {id: this.$route.params.id} })
      .then(response => this.post = response.data);
  }
}
</script>

<style lang="css">
</style>
