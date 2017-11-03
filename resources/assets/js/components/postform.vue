<template lang="html">
    <div>
      <form @submit.prevent="addPost">
        <div class="form-group">
            <div>
              <label for="title">Введите заголовок</label>
              <input class="form-control" v-model="post.title" id="titile" type="text" placeholder="Сюда заголовок" required>
            </div>
            <div>
              <label for="body">Введите текст</label>
              <textarea class="form-control" rows="2" id="body"
              v-model="post.body"
              placeholder="А текст сюда :)" required></textarea>
            </div>
        </div>
          <button class="btn btn-primary" type="submit">Запостить</button>
      </form>
    <hr>
    </div>
</template>

<script>
export default {
  props:['postForm'],
  data(){
    return {
      post: new Crud({
        title: this.postForm.title,
        body: this.postForm.body
      })
    };
  },
  methods: {
    addPost() {
      this.$emit('doAddPost', this.post);
    }
  }
}
</script>

<style lang="css">
</style>
