<template lang="html">
  <!-- Post form compoent -->
    <div>
      <form @submit.prevent="addPost">
        <div class="form-group">
            <div>
              <label for="title">Введите заголовок</label>
              <input class="form-control" v-model="post.title" id="titile" type="text" placeholder="Сюда заголовок" required>
            </div>
            <div>
              <label for="body">Введите текст</label>
              <quill-editor
              class="wysiwyg"
              v-model="post.body"
              ></quill-editor>
            </div>
        </div>
          <button class="btn btn-primary" type="submit">Запостить</button>
      </form>
    <hr>
    </div>
</template>

<script>
import { quillEditor } from 'vue-quill-editor';

export default {
  props:['postForm'],
  data(){
    return {
      post: new Crud({
        title: this.postForm.title,
        body: this.postForm.body,
        id: this.postForm.id
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
.ql-container{
  min-height:20rem;
}
</style>
