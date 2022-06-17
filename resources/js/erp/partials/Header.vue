<template>
  <div class="sidebar-pinned ">

<header class="admin-header">

    <a href="#" class="sidebar-toggle" data-toggleclass="sidebar-open" data-target="body"> </a>

    <nav class=" mr-auto my-auto">
        <ul class="nav align-items-center">

        
            <li class="nav-item">
             
            </li>
        </ul>
    </nav>
    <nav class=" ml-auto">
        <ul class="nav align-items-center">

          
              <li class="nav-item">
                <button type="button"  class="btn btn-default"><i class="fe fe-maximize"></i></button>
              </li>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#"   role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm avatar-online">
                         <!-- <vue-initials-img name="Remote' Company" class="text-center rounded-circle"  /> -->
                         TRC

                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right"   >
                    <a class="dropdown-item" href="/#">  Settings
                    </a>
                    <a class="dropdown-item" href="#">  Help </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" > Logout</a>
                </div>
            </li>

        </ul>

    </nav>
</header>
<!--site header ends -->


  </div>
</template>

<script>

export default {
  components: {
  },
  data(){
    return{
      fullscreen: false,
      teleport: true,
      pageOnly: false

    }
  },
  beforeMount(){
   
  },
  methods:{
   
   
  },
  created(){

  }
}
</script>
