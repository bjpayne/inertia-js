<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    agentId: String,
    agentName: String,
});

let form = useForm({
    agentId: props.agentId,
    agentName: props.agentName
});

let submit = () => {
    form.post(route('store'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="agentId" value="Agent Writing Code:"/>
                                <TextInput id="agentId" type="text" class="mt-1 block w-full" v-model="form.agentId"
                                           autofocus autocomplete="agentId"
                                />
                                <InputError class="mt-2" :message="form.errors.agentId"/>
                            </div>

                            <div class="mt-3">
                                <InputLabel for="agentName" value="Agent Name:"/>
                                <TextInput id="agentName" type="text" class="mt-1 block w-full" v-model="form.agentName"
                                           autofocus autocomplete="agentName"
                                />
                                <InputError class="mt-2" :message="form.errors.agentName"/>
                            </div>

                            <div class="mt-3">
                                <InputLabel for="agentName" value="Agent Name:"/>
                                <TextInput id="agentName" type="text" class="mt-1 block w-full" v-model="form.agentName"
                                           autofocus autocomplete="agentName"
                                />
                                <InputError class="mt-2" :message="form.errors.agentName"/>
                            </div>

                            <!--                                    <label class="block">-->
<!--                                        <span class="text-gray-700">Agent Name:</span>-->
<!--                                        <input type="text"-->
<!--                                               class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('agentName') border-red-500 @enderror"-->
<!--                                               value="{{ $user->name }}" name="agentName"-->
<!--                                        >-->

<!--                                        @error('agentName')-->
<!--                                        <div class="text-red-500 mt-2 text-sm">-->
<!--                                            {{ $message }}-->
<!--                                        </div>-->
<!--                                        @enderror-->
<!--                                    </label>-->

<!--                                    <label class="block">-->
<!--                                        <span class="text-gray-700">Beneficiary First Name:</span>-->
<!--                                        <input type="text"-->
<!--                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('beneficiaryFirstName') border-red-500 @enderror"-->
<!--                                               name="beneficiaryFirstName" value="{{ old('beneficiaryFirstName') }}"-->
<!--                                        >-->

<!--                                        @error('beneficiaryFirstName')-->
<!--                                        <div class="text-red-500 mt-2 text-sm">-->
<!--                                            {{ $message }}-->
<!--                                        </div>-->
<!--                                        @enderror-->
<!--                                    </label>-->

<!--                                    <label class="block">-->
<!--                                        <span class="text-gray-700">Beneficiary Last Name:</span>-->
<!--                                        <input type="text"-->
<!--                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('beneficiaryLastName') border-red-500 @enderror"-->
<!--                                               name="beneficiaryLastName" value="{{ old('beneficiaryLastName') }}"-->
<!--                                        >-->

<!--                                        @error('beneficiaryLastName')-->
<!--                                        <div class="text-red-500 mt-2 text-sm">-->
<!--                                            {{ $message }}-->
<!--                                        </div>-->
<!--                                        @enderror-->
<!--                                    </label>-->

<!--                                    <div class="block">-->
<!--                                        <div class="mt-2">-->
<!--                                            <label class="inline-flex items-center">-->
<!--                                                <input type="radio"-->
<!--                                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"-->
<!--                                                       name="beneficiary" value="self" v-model="beneficiary"><span class="ml-2">Self</span>-->
<!--                                            </label>-->

<!--                                            <label class="ml-3 inline-flex items-center">-->
<!--                                                <input type="radio"-->
<!--                                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"-->
<!--                                                       name="beneficiary" value="representative" v-model="beneficiary"><span class="ml-2">Authorized Representative</span>-->
<!--                                            </label>-->

<!--                                            @error('beneficiary')-->
<!--                                            <div class="text-red-500 mt-2 text-sm">-->
<!--                                                {{ $message }}-->
<!--                                            </div>-->
<!--                                            @enderror-->
<!--                                        </div>-->
<!--                                    </div>-->

<!--                                    <div class="block" v-if="beneficiary === 'representative'">-->
<!--                                        <label class="block">-->
<!--                                            <span class="text-gray-700">Authorized Rep Name:</span>-->
<!--                                            <input type="text"-->
<!--                                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('authorizedRepName') border-red-500 @enderror"-->
<!--                                                   name="authorizedRepName" value="{{ old('authorizedRepName') }}"-->
<!--                                            >-->

<!--                                            @error('authorizedRepName')-->
<!--                                            <div class="text-red-500 mt-2 text-sm">-->
<!--                                                {{ $message }}-->
<!--                                            </div>-->
<!--                                            @enderror-->
<!--                                        </label>-->

<!--                                        <label class="block">-->
<!--                                            <span class="text-gray-700">Authorized Rep Relationship:</span>-->
<!--                                            <textarea class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('authorizedRepRelationship') border-red-500 @enderror" rows="3" name="authorizedRepRelationship"-->
<!--                                            >{{ old('authorizedRepRelationship') }}</textarea>-->

<!--                                            @error('authorizedRepRelationship')-->
<!--                                            <div class="text-red-500 mt-2 text-sm">-->
<!--                                                {{ $message }}-->
<!--                                            </div>-->
<!--                                            @enderror-->
<!--                                        </label>-->
<!--                                    </div>-->

<!--                                    <div class="block">-->
<!--                                        <div>-->
<!--                                            <x-primary-button>-->
<!--                                                {{ __('Submit') }}-->
<!--                                            </x-primary-button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
