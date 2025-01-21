import { eventTypes, MisiType } from '@/types/PropsType'

export const eventsConstants: eventTypes[] = [
    {
        title: 'Wisuda Sarjana ke-10',
        dateStart: new Date(2024, 10, 15),
        date: new Date(2024, 10, 15),
        // dateEnd: (() => {
        //     let date = new Date(2024, 0, 15)
        //     date.setDate(date.getDate() + 1) // 16 Januari 2024
        //     return date
        // })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Dies Natalis ke-10',
        dateStart: new Date(),
        date: new Date(),
        // dateEnd: (() => {
        //     let date = new Date()
        //     date.setDate(date.getDate() + 1)
        //     return date
        // })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Wisuda Sarjana ke-10',
        dateStart: new Date(),
        date: new Date(),
        dateEnd: (() => {
            let date = new Date()
            date.setDate(date.getDate() + 1)
            return date
        })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Riuh Wisuda Sarjana ke-10',
        dateStart: new Date(),
        date: new Date(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Seminar Nasional ke-10',
        dateStart: new Date(),
        date: new Date(),
        dateEnd: (() => {
            let date = new Date()
            date.setDate(date.getDate() + 1)
            return date
        })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Seminar Nasional ke-10',
        dateStart: new Date(),
        date: new Date(),
        dateEnd: (() => {
            let date = new Date()
            date.setDate(date.getDate() + 1)
            return date
        })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Seminar Nasional ke-10',
        dateStart: new Date(),
        date: new Date(),
        dateEnd: (() => {
            let date = new Date()
            date.setDate(date.getDate() + 1)
            return date
        })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    },
    {
        title: 'Wisuda Sarjana ke-10',
        dateStart: new Date(2024, 0, 15), // 15 Januari 2024
        date: new Date(2024, 0, 15), // 15 Januari 2024
        dateEnd: (() => {
            let date = new Date(2024, 0, 15)
            date.setDate(date.getDate() + 1) // 16 Januari 2024
            return date
        })(),
        description:
            'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, doloremque.'
    }
]

export const misiConstants: MisiType[] = [
    {
        title: 'Meningkatkan kualitas pendidikan dan pengajaran'
    },
    {
        title: 'Meningkatkan  kualitas penelitian dan pengabdian kepada masyarakat'
    },
    {
        title: 'Meningkatkan  kualitas penelitian dan pengabdian kepada masyarakat'
    }
]

export const logoBox = '/assets/img/logo-box.png'

export const TestImage = '/assets/img/test.png'

export const beritaConstants = [
    {
        title: 'Gelar LMBKA Karya Studio Setingkat Nasional',
        date: new Date(),
        image: TestImage
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: TestImage
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: TestImage
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: TestImage
    }
]
