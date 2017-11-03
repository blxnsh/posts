<template lang="html">
<div class="from-group">
  <form @submit.prevent="addComment">
    <label for="name">Имя</label>
    <input v-model="comment.name" class="form-control" type="text" id="name" required>

    <label for="email">Э-мейл</label>
    <input v-model="comment.email" class="form-control" type="email" id="email" required>

    <label for="body">Текст</label>
    <textarea v-model="comment.body" id="body" cols="5" rows="5"
    class="form-control" required></textarea>

    <br>
    <button type="submit" class="btn btn-primary">Прокоментировать</button>
  </form>
</div>
</template>

<script>
export default {
 props: ['posts_id'],
  data(){
    return {
      comment: new Crud({
        posts_id: this.posts_id,
        name:'',
        email:'',
        body:'',
      })
    };
  },
  methods: {
    addComment() {
      this.$emit('addComment', this.comment);
    }
  }

}
</script>

<style lang="css">
</style>
