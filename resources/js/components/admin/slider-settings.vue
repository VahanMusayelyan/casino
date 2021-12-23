<template>
    <div class="card-body">
        <input type="hidden" name="HOME_SLIDER" :value="JSON.stringify(slider)">
        <div class="form-group col-md-6 px-0">
            <label>{{ __('Animation') }}</label>
            <select v-model="slider.animation" class="custom-select">
                <option value="fade" :selected="slider.animation=='fade'">{{ __('Fade') }}</option>
                <option value="slide" :selected="slider.animation=='slide'">{{ __('Slide') }}</option>
            </select>
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input v-model="slider.indicators" id="switch-indicators" type="checkbox" class="custom-control-input">
                <label class="custom-control-label" for="switch-indicators">
                    {{ __('Indicators') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input v-model="slider.controls" id="switch-controls" type="checkbox" class="custom-control-input">
                <label class="custom-control-label" for="switch-controls">
                    {{ __('Controls') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group col-md-6 px-0">
                <label>{{ __('Interval') }}</label>
                <div class="input-group">
                    <input v-model.number="slider.interval" type="text" class="form-control">
                    <div class="input-group-append">
                        <span class="input-group-text">{{ __('seconds') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <template v-if="slider.slides">
            <div class="accordion">
                <div v-for="(slide, i) in slider.slides" :key="i" class="card">
                    <div class="card-header px-0">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" :data-target="`#tab-home-slider-slide-${i}`" aria-expanded="true">
                                {{ __('Slide') }} {{ i+1 }}
                            </button>
                            <button class="btn btn-danger" @click="deleteSlide(i)">
                                <i class="far fa-trash-alt fa-sm"></i>
                            </button>
                        </h5>
                    </div>
                    <div :id="`tab-home-slider-slide-${i}`" class="collapse ml-3">
                        <div class="form-group">
                            <label>{{ __('Title') }}</label>
                            <input v-model="slider.slides[i].title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Subtitle') }}</label>
                            <input v-model="slider.slides[i].subtitle" type="text" class="form-control">
                        </div>
                        <file-upload
                            v-model="slider.slides[i].image.url"
                            :label="__('Image')"
                            :path="slider.slides[i].image.url"
                            :file-name="`slider-${i+1}`"
                            folder="home/slider"
                        />
                        <div class="form-group">
                            <label>{{ __('Link title') }}</label>
                            <input v-model="slider.slides[i].link.title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Link URL') }}</label>
                            <input v-model="slider.slides[i].link.url" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Link class') }}</label>
                            <input v-model="slider.slides[i].link.class" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <button class="btn btn-primary" @click.prevent="addSlide">
            {{ __('Add new slide') }}
        </button>
    </div>
</template>

<script>
import { __ } from '~/utils'
import FileUpload from './file-upload';

export default {
    components: {FileUpload},

    props: {
        settings: {
            type: Object,
            required: false,
        }
    },

    data() {
        return {
            slider: this.$props.settings
        }
    },

    computed: {
        //
    },

    methods: {
        __,
        addSlide() {
            this.slider.slides.push({
                title: '',
                subtitle: '',
                image: {
                    url: ''
                },
                link: {
                    title: '',
                    url: '',
                    class: '',
                }
            })
        },
        deleteSlide(i) {
            this.slider.slides.splice(i, 1)
        }
    }
}
</script>
