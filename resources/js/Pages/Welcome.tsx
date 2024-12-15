import IconHome from '@/Components/Icon/IconHome'
import AppLayout from '../Layouts/AppLayout'
import {
    Button,
    Card,
    CardBody,
    CardHeader,
    Image,
    Link
} from '@nextui-org/react'
import { motion } from 'framer-motion'
import { useVisitor } from '@/Providers/VisitorProvider'
import { Slider } from '@/Components/Slider'
import React, { ReactNode, useState } from 'react'
import { DateFormater } from '@/Helper/DateFormater'
import CountAnimation from '@/Animation/CountAnimation'
import MultyPersonIcon from '@/Components/Icon/MultyPersonIcon'

type WelcomeProps = {
    name: string
}

const berita = [
    {
        title: 'Gelar Lmbka Karya Studio Setingkat Nasional',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    },
    {
        title: 'Staf Pengajar Prodi Desain Komunikasi Visual Raih Penghargaan',
        date: new Date(),
        image: './assets/img/test.png'
    }
]

export default function Welcome({ name }: WelcomeProps) {
    const [sliderIndicators, setSliderIndicators] = useState<ReactNode>(null)

    const handelReciveComponent = (component: ReactNode) => {
        setSliderIndicators(component)
    }
    const visitor = useVisitor()
    const logo = '/assets/img/logo.png'
    const logoBox = '/assets/img/logo-box.png'

    const navigate = (name: string) => {
        window.location.href = route(name)
    }

    console.log(visitor)

    return (
        <AppLayout title={'welcome'}>
            {/* <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center text"> Wlecome </p>
                <p> {name} test </p>
                <img src={image} alt="test" />
                <Button color="primary" onClick={() => navigate('about')}>
                    <IconHome size={24} /> Home
                </Button>
                <Link href={route('berita')}>
                    {visitor.visitorCount} {JSON.stringify(visitor.visitorData)}
                </Link>
            </div> */}

            <section className="aspect-[11/4] flex items-center justify-center bg-gray-50">
                <Slider
                    autoSlider={false}
                    sendComponent={handelReciveComponent}
                >
                    {berita.map((item, index) => (
                        <div
                            key={index}
                            className="w-full h-full bg-cover bg-center overflow-hidden"
                            style={{ backgroundImage: `url(${item.image})` }}
                        >
                            <div className="h-full flex items-center bg-gradient-to-r from-[#236899] from-10% to-transparent to-110%">
                                <div className="ms-28 me-96 px-10 flex flex-col justify-between">
                                    <h1 className="text-white text-5xl pb-10 font-bold">
                                        {item.title}
                                    </h1>
                                    <div className="">
                                        <p className="text-white text-sm">
                                            {DateFormater({ date: item.date })}
                                        </p>
                                        {sliderIndicators}
                                        <Button className="bg-main-green font-semibold text-white inline-block">
                                            Baca Selengkapnya
                                        </Button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        // </div>
                    ))}
                </Slider>
            </section>
            <section id="statistik" className="max-w-5xl mx-auto py-20">
                <div className=" grid grid-cols-1 md:grid-cols-2 gap-10 justify-between">
                    <div className="">
                        <h1 className="font-bold text-4xl">
                            Perencanaan Wilayah dan Kota
                        </h1>
                        <h1 className="font-bold text-4xl text-main-green py-3">
                            ITERA
                        </h1>
                        <p className="py-4 font-semibold text-lg">
                            We reached here with our hard work and dedication
                        </p>
                    </div>
                    <div className=" grid grid-cols-2 g gap-5">
                        <div className="flex gap-4">
                            <MultyPersonIcon
                                size={74}
                                className="stroke-main-green fill-main-green"
                            />
                            <div className="flex flex-col gap-1">
                                <CountAnimation
                                    from={0}
                                    to={100}
                                    duration={2}
                                    className="font-bold text-4xl text-main-green"
                                />
                                <p className="font-semibold text-lg">
                                    Mahasiswa
                                </p>
                            </div>
                        </div>
                        <div className="flex gap-4">
                            <MultyPersonIcon
                                size={74}
                                className="stroke-main-green fill-main-green"
                            />
                            <div className="flex flex-col gap-1">
                                <CountAnimation
                                    from={0}
                                    to={100}
                                    duration={2}
                                    className="font-bold text-4xl text-main-green"
                                />
                                <p className="font-semibold text-lg">Dosen</p>
                            </div>
                        </div>
                        <div className="flex gap-4">
                            <MultyPersonIcon
                                size={74}
                                className="stroke-main-green fill-main-green"
                            />
                            <div className="flex flex-col gap-1">
                                <CountAnimation
                                    from={0}
                                    to={100}
                                    duration={2}
                                    className="font-bold text-4xl text-main-green"
                                />
                                <p className="font-semibold text-lg">tendik</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section className="py-20 w-full bg-secondary-blue ">
                <div className="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-5">
                    <div className="col-span-2">
                        <Image src={logoBox} className="" />
                    </div>

                    <div className="col-span-3">
                        <h1 className="text-4xl font-bold">
                            Perencanaan Wilayah Dan Kota ITERA
                        </h1>
                        <p className="py-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Natus sapiente eaque deleniti reiciendis sunt
                            explicabo consectetur quae sequi itaque maiores?
                            Impedit aspernatur eum animi provident! Perferendis
                            eveniet adipisci sequi quisquam?
                        </p>

                        <Button className="bg-main-green font-semibold text-white inline-block">
                            Baca Selengkapnya
                        </Button>
                    </div>
                </div>
            </section>
            <section className="py-20 w-full">
                <div className="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-5 gap-10">
                    <div className="col-span-3">
                        <h1 className="text-4xl font-bold">Visi</h1>
                        <p className="py-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Natus sapiente eaque deleniti reiciendis sunt
                            explicabo consectetur quae sequi itaque maiores?
                            Impedit aspernatur eum animi provident! Perferendis
                            eveniet adipisci sequi quisquam?
                        </p>

                        <Button className="bg-main-green font-semibold text-white inline-block">
                            Baca Selengkapnya
                        </Button>
                    </div>
                    <div className="col-span-2">
                        <Image src={logoBox} className="" />
                    </div>
                </div>
            </section>
            <section className="py-20 w-full bg-secondary-blue">
                <div className="max-w-5xl mx-auto ">
                    <h1 className="text-4xl font-bold pb-5 text-center">
                        Misi
                    </h1>
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-10">
                        <Card className="p-10">
                            <CardHeader className="font-bold text-lg">
                                <h3>Misi 1</h3>
                            </CardHeader>
                            <CardBody className="">
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Amet nisi dolorem cum.
                                </p>
                            </CardBody>
                        </Card>
                        <Card className="p-8">
                            <CardHeader className="font-bold text-lg">
                                <h3>Misi 1</h3>
                            </CardHeader>
                            <CardBody className="">
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Amet nisi dolorem cum.
                                </p>
                            </CardBody>
                        </Card>
                        <Card className="p-10">
                            <CardHeader className="font-bold text-lg">
                                <h3>Misi 1</h3>
                            </CardHeader>
                            <CardBody className="">
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Amet nisi dolorem cum.
                                </p>
                            </CardBody>
                        </Card>
                    </div>
                    {/* <div className="col-span-3">
                        <p className="py-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Natus sapiente eaque deleniti reiciendis sunt
                            explicabo consectetur quae sequi itaque maiores?
                            Impedit aspernatur eum animi provident! Perferendis
                            eveniet adipisci sequi quisquam?
                        </p>

                        <Button className="bg-main-green font-semibold text-white inline-block">
                            Baca Selengkapnya
                        </Button>
                    </div> */}
                </div>
            </section>
        </AppLayout>
    )
}
