<template lang="html">
  <div>
    <div class="panel panel-default">
      <div class="panel-body">
      <p>
        {{comment.name}} ({{comment.email}}) прокомментировал:
      </p>
      <p>
        {{comment.body}}
      </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
props:['comment']
}
</script>

<style lang="css">
</style>
