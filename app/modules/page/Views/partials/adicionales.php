
<div class="loader-bx">
    <span class="loader"></span>
</div>
<style>
    .loader-bx {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, .5);
        z-index: 99999;
        top: 0;
        left: 0;
        justify-content: center;
        align-items: center;
    }

    .loader-bx.show {
        display: flex;
    }

    .loader {
        width: 48px;
        height: 48px;
        display: block;
        margin: 15px auto;
        position: relative;
        color: #FFF;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    .loader::after,
    .loader::before {
        content: '';
        box-sizing: border-box;
        position: absolute;
        width: 24px;
        height: 24px;
        top: 50%;
        left: 50%;
        transform: scale(0.5) translate(0, 0);
        background-color: #FFF;
        border-radius: 50%;
        animation: animloader 1s infinite ease-in-out;
    }

    .loader::before {
        background-color: var(--azul);
        transform: scale(0.5) translate(-48px, -48px);
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes animloader {
        50% {
            transform: scale(1) translate(-50%, -50%);
        }
    }
</style>
