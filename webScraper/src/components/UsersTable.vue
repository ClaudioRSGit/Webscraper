<template>
        <div class="card mb-4 mt-3">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5 class="fw-bold">Users</h5>
                <button type="button" class="btn btn-primary" @click="showModal">Add User</button>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                        <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Full Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id" v-if="users.length > 0">
                        <td>
                            <div class="d-flex px-2 py-1">
                            <div>
                                <span class="avatar bg-primary avatar-sm me-3 mt-1">{{ user.firstName.charAt(0).toUpperCase() }}</span>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="fw-bold text-dark mb-0 text-sm">#{{ user.id }}</span>
                                <h5 class="text-xs text-secondary mb-0">{{ user.firstName }} {{ user.lastName }}</h5>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs text-secondary mb-0">{{ user.email }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm" :class="{'bg-gradient-success': user.isActive == 1, 'bg-gradient-danger': user.isActive == 0}">
                                {{ user.isActive == 1 ? 'Active' : 'Inactive'}}
                            </span>
                        </td>
                        <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">{{ getRoleDescription(user.role_id) }}</span>
                        </td>
                        <td class="align-middle">
                            <a class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                <div class="d-flex justify-content-around">
                                    <i class="fas fa-edit" @click.prevent="editUser(user.id)"></i>
                                    <i class="fas fa-trash" @click.prevent="destroyUser(user.id)"></i>
                                </div>
                            </a>
                        </td>
                        </tr>
                        <tr v-else>
                            <span class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No users to show</span>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
        </div>
        
        <!-- Modal - passar para componente-->
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Create User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="submitUser" method="post">
                    <div class="modal-body">
                        <div class="row">
                        <div class="col">
                            <label for="firstName" class="form-label">First Name</label>
                            <input class="form-control" type="text" v-model="firstName" id="firstName" name="firstName" placeholder="Insert first name" required>
                        </div>
                        <div class="col">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input class="form-control" type="text" v-model="lastName" id="lastName" name="lastName" placeholder="Insert last name" required>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" v-model="email" id="email" name="email" placeholder="Insert email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" v-model="password" id="password" name="password" placeholder="Insert Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" v-model="confirmPassword" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-check-label">Status:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" v-model="isActive" id="active" name="isActive" value="1">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" v-model="isActive" name="isActive" id="inactive" value="0">
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" v-model="role_id" name="role_id" id="role" required>
                            <option value="" disabled>Select role</option>
                            <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.description }}</option>
                            </select>
                        </div>
                        <div class="alert alert-danger" v-if="errors.length">
                        <ul>
                            <li v-for="error in errors" :key="error">{{ error }}</li>
                        </ul>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDeleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" @click="confirmUserDeletion()">Yes</button>
                </div>
            </div>
        </div>
    </div>         
    -->
</template>

<script>
    import { ref, onMounted } from 'vue';
    import { getUsers, createUsers, getRoles, deleteUser } from '@/services/http.js';
    import axiosInstance from '@/services/http.js';

    export default {
        name: 'UsersTable',
        setup() {
        const users = ref([]);
        const firstName = ref('');
        const lastName = ref('');
        const email = ref('');
        const password = ref('');
        const confirmPassword = ref('');
        const isActive = ref('1');
        const role_id = ref('');
        const errors = ref([]);
        const roles = ref([]);
        const userToEditId = ref(null);
        
        const fetchUsers = async () => {
            try {
            users.value = await getUsers();
            } catch (error) {
            console.error(error);
            }
        };

        const fetchRoles = async () => {
        try {
            roles.value = await getRoles();
        } catch (error) {
            console.error(error);
        }
        };
    
        const submitUser = async () => {
            errors.value = [];
            if (validateForm()) {
                if (password.value !== confirmPassword.value) {
                    errors.value.push('Passwords do not match');
                    return;
                }
                try {
                    if (userToEditId.value) {
                        updateUser(userToEditId.value);
                    } else {
                        const newUser = {
                            firstName: firstName.value,
                            lastName: lastName.value,
                            email: email.value,
                            password: password.value,
                            isActive: isActive.value,
                            role_id: role_id.value
                        };
                        
                        createUsers(newUser);
                        resetForm();
                        fetchUsers();

                        $('#userModal').modal('hide');
                    }
                } catch (error) {
                    console.error(error);
                }
            } else {
                if (!firstName.value) errors.value.push('First Name required');
                if (!lastName.value) errors.value.push('Last Name required');
                if (!email.value) errors.value.push('Email required');
                if (!password.value) errors.value.push('Password required');
                if (!confirmPassword.value) errors.value.push('Confirm Password required');
                if (!isActive.value) errors.value.push('Status required');
                if (!role_id.value) errors.value.push('Role required');
            }
        };
        const editUser = async (id) => {
            try {
                if (id) {
                userToEditId.value = id;
                const response = await axiosInstance.get(`/user/${id}`);
                const userData = response.data;

                firstName.value = userData.firstName;
                lastName.value = userData.lastName;
                email.value = userData.email;
                password.value = userData.password;
                confirmPassword.value = userData.password;
                isActive.value = userData.isActive;
                role_id.value = userData.role_id;

                $('#userModalLabel').text('Update User');
                
                }else{
                    resetForm();
                    userToEditId.value = null;
                    console.log('userToEditId.value: ', userToEditId.value);
                    $('#userModalLabel').text('Create User');
                }
                $('#userModal').modal('show');
            } catch (error) {
                console.error(error);
            }
        };

         const updateUser = async () => {
         errors.value = [];
         if (validateForm()) 
         {
         try {
             let response;
             const userExists = users.value.some(user => user.id === userToEditId.value);

             if (userExists) {
                 response = await axiosInstance.put(`/updateUser/${userToEditId.value}`, {
                     firstName: firstName.value,
                     lastName: lastName.value,
                     email: email.value,
                     password: password.value,
                     isActive: isActive.value,
                     role_id: role_id.value
                 });
                 } else {
                     const newUser = {
                         firstName: firstName.value,
                         lastName: lastName.value,
                         email: email.value,
                         password: password.value,
                         isActive: isActive.value,
                         role_id: role_id.value
                     };
                     userToEditId.value = null;
                     resetForm();
                     fetchUsers();
                     response = await createUsers(newUser);
                 }
                     userToEditId.value = null;
                     fetchUsers();
                     resetForm();

                     $('#userModal').modal('hide');
                 } catch (error) {
                     console.error(error);
                 }
             } else {
                 if (!firstName.value) errors.value.push('First Name required');
                 if (!lastName.value) errors.value.push('Last Name required');
                 if (!email.value) errors.value.push('Email required');
                 if (!password.value) errors.value.push('Password required');
                 if (!confirmPassword.value) errors.value.push('Confirm Password required');
                 if (!isActive.value) errors.value.push('Status required');
                 if (!role_id.value) errors.value.push('Role required');
             }
         };

        

        const getRoleDescription = (role_id) => {
            const role = roles.value.find(role => role.id === role_id);
            return role ? role.description : 'Unknown Role';
        };

        const destroyUser = async (id) => {
            try {
                await deleteUser(id);
                fetchUsers();
            } catch (error) {
                console.error(error);
            }
        };

        const showModal = () => {
            resetForm();
            $('#userModal').modal('show');
        };

        const resetForm = () => {
            firstName.value = '';
            lastName.value = '';
            email.value = '';
            password.value = '';
            confirmPassword.value = '';
            isActive.value = '1';
            role_id.value = '';
        };
        const validateForm = () => {
            if (firstName.value && 
            lastName.value &&
            email.value &&
            password.value &&
            confirmPassword.value &&
            isActive.value &&
            role_id.value !== '') 
            {
                fetchUsers();
                return true;
            } else {
                return false;
            }
        };

        onMounted(fetchUsers);
        onMounted(fetchRoles);
    
        return {
            firstName,
            lastName,
            email,
            password,
            confirmPassword,
            isActive,
            role_id,
            roles,
            users,
            errors,
            createUsers,
            submitUser,
            showModal,
            getRoleDescription,
            deleteUser,
            destroyUser,
            editUser,
            updateUser,
            fetchUsers,
            fetchRoles,
            userToEditId,
            resetForm,
            validateForm
        };
        }
    };
</script>

<style>
@import url("../assets/table.css");
    i{
        cursor: pointer;
        text-decoration: none!important;
    }
</style>