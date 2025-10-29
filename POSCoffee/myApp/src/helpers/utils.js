import { alertController, toastController, loadingController, modalController } from '@ionic/vue';



export async function showToast(message, color = "") {
    const toast = await toastController.create({
        message: stripHtmlTags(message),
        duration: 5000,
        position: "top",
        swipeGesture: "vertical",
        color: color
    });
    toast.present();
}

export async function showWarning(message) {
    const toast = await toastController.create({
        message: message,
        duration: 5000,
        position: "top",
        swipeGesture: "vertical",
        color: "warning"
    });
    toast.present();
}

export async function showSuccess(message) {
    const toast = await toastController.create({
        message: message,
        duration: 5000,
        position: "top",
        swipeGesture: "vertical",
        color: "success"
    });
    toast.present();
}

export async function showError(message) {
    const toast = await toastController.create({
        message: message,
        duration: 5000,
        position: "top",
        swipeGesture: "vertical",
        color: "danger"
    });
    toast.present();
}