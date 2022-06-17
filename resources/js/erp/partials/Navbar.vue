<template>
  <div class="sidebar-pinned ">
    <aside class="admin-sidebar">
      <div class="admin-sidebar-brand">
        <!-- begin sidebar branding-->
        <img
          class="admin-brand-logo"
          src="/assets/img/kgshia_logo.png"
          width="40"
          alt="atmos Logo"
        />
        <!-- end sidebar branding-->
        <div class="ml-auto">
          <!-- sidebar pin-->
          <a
            href="#"
            class="admin-pin-sidebar btn-ghost btn btn-rounded-circle"
          ></a>
          <!-- sidebar close for mobile device-->
          <a href="#" class="admin-close-sidebar"></a>
        </div>
      </div>
      <div class="admin-sidebar-wrapper js-scrollbar">
        <ul class="menu">
          <li class="menu-item active ">
            <router-link to="/client-dashboard" class=" menu-link">
              <span class="menu-label">
                <span class="menu-name">Home </span>
              </span>
              <span class="menu-icon">
                <i class="icon-placeholder fe fe-home "></i>
              </span>
            </router-link>
          </li>

          <li class="menu-item active " >
            <router-link to="/hmo-dashboard" class=" menu-link">
              <span class="menu-label">
                <span class="menu-name">Admin </span>
              </span>
              <span class="menu-icon">
                <i class="icon-placeholder fe fe-home "></i>
              </span>
            </router-link>
          </li>

        </ul>
      </div>
    </aside>

    <Header />
  </div>
</template>

<script>
import Header from "./Header.vue";

export default {
  components: {
    Header,
  },
  data() {
    return {
     
    };
  },
  beforeMount() {
   
  },
  methods: {},
  created() {},
};
</script>
