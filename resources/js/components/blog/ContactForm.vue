<template>
    <div class="col-8 col-12-small">
        <transition name="fade" mode="out-in">
            <p v-if="sent">Tu mensaje ha sido recibido te contactaremos pronto</p>
            <form v-else @submit.prevent="submit">
                <div class="row gtr-uniform gtr-50">
                    <div class="col-6 col-12-xsmall">
                        <input v-model="form.name" type="text"  name="name" placeholder="Name" required/>
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input v-model="form.email" type="email" name="email"  placeholder="Email" required/>
                    </div>
                    <div class="col-12">
                        <input v-model="form.subject" type="text" name="subject" placeholder="Subject" required/>
                    </div>
                    <div class="col-12">
                        <textarea v-model="form.message" name="message" placeholder="Message" rows="4" required></textarea>
                    </div>
                </div>
                <ul class="actions mt-3">
                    <button type="submit" :disabled="sending">
                        <span v-if="sending">Sending Message...</span>
                        <span v-else>Send Message</span>
                    </button>
                </ul>
            </form>
        </transition>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                sent: false,
                sending: false,
                form: {
                    name: '',
                    email: '',
                    subject: '',
                    messaage: '',

                }
            }
        },
        methods: {
            submit() {
                this.sending = true;
                axios.post('/api/send-message',this.form)
                .then(response => {
                    this.sent = true;
                    this.sending = false;
                })
                .catch(errors => {
                    this.sent = false;
                    this.sending = false;
                })
            }
        }
    }
</script>
