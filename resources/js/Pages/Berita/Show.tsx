import { Link } from '@inertiajs/react'
import AppLayout from '../../Layouts/AppLayout'
import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { beritaConstants, TestImage } from '@/Constants'
import NewsItem from '@/Components/News/NewsItem'
import { Button, Image } from '@heroui/react'
import BouncingAnimation from '@/Animation/BouncingAnimation'
import { DateFormater } from '@/Helper/DateFormater'
import ControlCenterMac from '@/Components/ControlCenterMac'

type ShowBeritaPageProps = {
    berita: {
        id: number
        judul: string
        isi: string
    }
}
export default function ShowBeritaPage({ berita }: ShowBeritaPageProps) {
    berita.isi = `<h2>Perayaan Hari Kemerdekaan di Kota Jakarta</h2>
<p>
    Jakarta meriah dengan berbagai kegiatan dalam rangka memperingati Hari Kemerdekaan ke-78 Republik Indonesia.
    Warga dari berbagai penjuru kota berkumpul di Monumen Nasional (Monas) untuk mengikuti upacara dan lomba-lomba.
</p>
<img src="https://example.com/path/to/image.jpg" alt="Perayaan Kemerdekaan di Monas" style="width:100%; max-height:400px;" />
<p>
    Kegiatan dimulai dengan upacara pengibaran bendera merah putih yang dihadiri oleh pejabat daerah, pelajar, dan masyarakat umum.
    Setelah upacara, diadakan berbagai perlombaan tradisional seperti <i>panjat pinang</i>, balap karung, dan tarik tambang.
</p>
<h3>Partisipasi Masyarakat</h3>
<ul>
    <li>
        Masyarakat sangat antusias mengikuti perlombaan. Salah satu peserta, Budi Santoso, mengungkapkan kebahagiaannya bisa
        ikut serta dalam perlombaan <i>panjat pinang</i>.
    </li>
    <li>
        Selain itu, pameran UMKM di sekitar Monas juga menjadi daya tarik tersendiri, menghadirkan produk-produk lokal berkualitas.
    </li>
</ul>
<p>
    Acara ditutup dengan penampilan seni budaya yang menampilkan tarian tradisional dari berbagai daerah di Indonesia, diiringi kembang api
    yang memeriahkan langit malam Jakarta.
</p>
`
    return (
        <AppLayout title={'Berita' + berita.judul}>
            <div className="container mx-auto px-4 py-3 relative min-h-[74vh]">
                {/* //image here */}

                <div className="grid grid-cols-7">
                    <div className="col-span-5">
                        {/*  */}
                        <div className="w-full  bg-cover bg-center rounded-3xl overflow-hidden border shadow-xl bg-white">
                            <div className="bg-main-blue bg-opacity-40 col-span-2 rounded-l-3xl rounded-b-3xl p-4">
                                <div className="grid grid-cols-5 justify-between ">
                                    <div className="col-span-3 overflow-hidden ">
                                        <ControlCenterMac className="pb-3" />
                                        <p className="text-white text-md md:text-4xl font-semibold md:font-bold me-2 md:me-10 overflow-hidden line-clamp-3 pb-1 md:pb-10">
                                            {berita.judul}
                                        </p>
                                        <div className="">
                                            <p className="text-black text-xs md:text-sm ">
                                                {DateFormater({
                                                    date: new Date()
                                                })}
                                            </p>
                                        </div>
                                    </div>
                                    <BouncingAnimation
                                        // key={index}
                                        className="col-span-2 relative "
                                    >
                                        <div className="w-[100%] rounded-xl md:rounded-3xl overflow-hidden border-3 border-main-green p-2">
                                            <Image
                                                src={TestImage}
                                                alt={berita.judul}
                                                className=" aspect-video object-cover object-bottom rounded-xl md:rounded-3xl"
                                            />
                                        </div>
                                        <div className="absolute -left-8 top-0 md:-left-12 md:top-10 lg:-left-20 w-20 h-20 lg:w-40 lg:h-40 bg-main-blue shadow-lg shadow-black/25 backdrop-blur-md rounded-full opacity-65 z-0"></div>
                                        <div className="absolute left-2 md:left-10 w-10 h-10 lg:w-28 lg:h-28 bg-yellow-400 shadow-lg shadow-black/25 backdrop-blur-md opacity-80  rounded-tl-[70%] rounded-tr-full rounded-br-[30%] z-10"></div>
                                    </BouncingAnimation>
                                </div>
                            </div>
                        </div>
                        {/*  */}
                        <h1 className="text-3xl font-bold">{berita.judul}</h1>
                        <div className="mt-10 bg-white p-5 rounded-3xl shadow-xl">
                            <ControlCenterMac />
                            <div
                                className="prose py-10"
                                dangerouslySetInnerHTML={{ __html: berita.isi }}
                            ></div>
                        </div>
                    </div>
                    <div className="col-span-2">
                        <SectionTrigerScroll
                            id="list-berita"
                            // macControlCenter
                            className="mt-10 p-5 "
                        >
                            {/* <h2 className="font-bold text-3xl pb-4 border-b">
                            Akademik
                        </h2> */}

                            <div className="grid grid-cols-1  gap-5">
                                {beritaConstants.map((item, index) => (
                                    <NewsItem
                                        id={index}
                                        key={index}
                                        title={item.title}
                                        date={new Date()}
                                        image={item.image}
                                        like={10}
                                        comment={10}
                                        see={10}
                                    />
                                ))}
                            </div>
                        </SectionTrigerScroll>
                    </div>
                </div>
            </div>
        </AppLayout>
    )
}
