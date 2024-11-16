import { Controller } from '@hotwired/stimulus';

export default class extends Controller {

    static targets = ["arrowOpen", "asideWrapper"]

    connect() {
    }

    async close() {
        if (this.hasAsideWrapperTarget) {
            this.asideWrapperTarget.classList.add('opacity-0')
            await this.#waitForAsideWrapperAnimation();
            this.asideWrapperTarget.classList.remove('open')
            await this.#waitForAsideWrapperAnimation();

            this.element.classList.remove('px-8', 'border-b')
        }

        this.element.classList.add('close')
        await this.#waitForAnimation();

        if (this.hasArrowOpenTarget) {
            this.arrowOpenTarget.classList.remove('hidden')
            this.arrowOpenTarget.classList.add('flex', 'justify-center')
        }
    }

    async open() {
        if (this.hasArrowOpenTarget) {
            this.arrowOpenTarget.classList.add('hidden')
            this.arrowOpenTarget.classList.remove('flex', 'justify-center')
        }

        this.element.classList.remove('close')
        await this.#waitForAnimation();
        this.element.classList.add('px-8')


        this.asideWrapperTarget.classList.add('open')
        await this.#waitForAsideWrapperAnimation();
        this.asideWrapperTarget.classList.remove('opacity-0')
    }

    #waitForAnimation() {
        return Promise.all(
            this.element.getAnimations().map((animation) => animation.finished),
        );
    }

    #waitForAsideWrapperAnimation() {
        return Promise.all(
            this.asideWrapperTarget.getAnimations().map((animation) => animation.finished),
        );
    }
}