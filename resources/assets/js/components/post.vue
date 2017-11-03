<template lang="html">
  <!-- post for list component -->
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">{{post.title}}</div>
      <div class="panel-body" v-html="shortenBody"></div>
      <div class="text-right">
        <button class="btn btn-primary btn-sm" @click="updatePost">Редактировать</button>
        <button class="btn btn-danger btn-sm" @click="deletePost">Удалить</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {

    };
  },
  props:['post'],
 mounted() {
   console.log('post loaded ' + this.post.title);
 },
 computed:{
   shortenBody(){
     return this.post.body.substring(0,299) + '...  ' + '<a href="#/post/' + this.post.id + '">Прочитать полностью</a>';
   }
 },
 methods: {
   updatePost(){
     this.$emit('updatePost', this.post);
   },
   deletePost(){
     this.$emit('deletePost', this.post);
   },
 }
}
</script>

<style lang="css">
</style>
