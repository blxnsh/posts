<template lang="html">
  <div>
    <div class="panel panel-default">
      <div class="panel-heading">{{post.title}}</div>
      <div class="panel-body">{{post.body}}</div>
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
   console.log('post loaded');
 }
}
</script>

<style lang="css">
</style>
