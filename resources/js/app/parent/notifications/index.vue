<template>
    <div>
            <h1 class="h2">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <router-link to="/parent/notifications/inbox"
                            >Inbox</router-link
                        >
                    </li>
                    <li class="breadcrumb-item">
                        <router-link to="/parent/notifications/all">All</router-link>
                    </li>
                </ol>
            </nav>
            <router-view/>  
    </div>
</template>

<script>

</script>
