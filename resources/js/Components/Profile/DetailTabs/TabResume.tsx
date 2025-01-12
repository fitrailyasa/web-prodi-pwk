import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@nextui-org/react'

type TabResumeProps = {
    data: any
}

const TabResume: React.FC<TabResumeProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_resume"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Profile
                </h2>
                <p className="">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 mt-10">
                    Bio Data
                </h2>
                <div className="gap-10 justify-between">
                    <div className="">
                        <tr>
                            <td className="font-bold pe-10">Nama</td>
                            <td>:</td>
                            <td>{data.name}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">NIK / NRK</td>
                            <td>:</td>
                            <td>{data.nik}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">NIDN</td>
                            <td>:</td>
                            <td>{data.nidn}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">Scoclar</td>
                            <td>:</td>
                            <td>{data.nidn}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">Scopus</td>
                            <td>:</td>
                            <td>{data.nidn}</td>
                        </tr>
                        <tr>
                            <td className="font-bold pe-10">Sinata </td>
                            <td>:</td>
                            <td>{data.nidn}</td>
                        </tr>
                    </div>
                </div>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_home"
                className="mt-10 bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Latar Belakang
                </h2>
                <div className="my-5">
                    <h3 className="font-bold text-2xl pb-3 border-b mb-3">
                        Latar Belakang Pendidikan
                    </h3>
                    <tr>
                        <td className="font-bold pe-10">S!</td>
                        <td>:</td>
                        <td>
                            {data.s1} {data.tahun}
                        </td>
                    </tr>
                    <tr>
                        <td className="font-bold pe-10">S2</td>
                        <td>:</td>
                        <td>
                            {data.s1} {data.tahun}
                        </td>
                    </tr>
                </div>
                <div className="my-5">
                    <h3 className="font-bold text-2xl pb-3 border-b mb-3">
                        Latar Belakang Pendidikan
                    </h3>
                    <tr>
                        <td className="font-bold pe-10">S!</td>
                        <td>:</td>
                        <td>
                            {data.s1} {data.tahun}
                        </td>
                    </tr>
                    <tr>
                        <td className="font-bold pe-10">S2</td>
                        <td>:</td>
                        <td>
                            {data.s1} {data.tahun}
                        </td>
                    </tr>
                </div>
            </SectionTrigerScroll>
        </>
    )
}

export default TabResume
