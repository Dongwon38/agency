document.addEventListener('DOMContentLoaded', () => {
    const services = document.querySelectorAll('.service-card');
    const service_details = document.querySelectorAll('.single-service-detail');
    services.forEach((service, index) => {
        service.addEventListener('click', () => {
            if (service_details[index].classList.contains('accordion-active')) {
                service_details[index].classList.remove('accordion-active');
            } else {
                service_details.forEach((single_detail) => {
                    single_detail.classList.remove('accordion-active');
                })
                service_details[index].classList.toggle('accordion-active');
            }
        })
    })
})