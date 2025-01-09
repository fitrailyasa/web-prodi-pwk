import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@nextui-org/react'

type TabHomeProps = {
    data: any
}

const TabHome: React.FC<TabHomeProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_home"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Bio Data
                </h2>
                <div className="gap-10 justify-between">
                    <div className="">
                        <p className="">Nama </p>
                        <p className="">Nama </p>
                        <p className="">Nama </p>
                        <p className="">Nama </p>
                    </div>
                    {/* <div className="col-span-3">
                        <p className="py-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Natus sapiente eaque deleniti reiciendis sunt
                            explicabo consectetur quae sequi itaque maiores?
                            Impedit aspernatur eum animi provident! Perferendis
                            eveniet adipisci sequi quisquam?
                        </p>
                    </div> */}
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
                <div className=" grid grid-cols-2 md:grid-cols-5 gap-10 justify-between">
                    <div className="col-span-3">
                        <p className="py-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing
                            elit. Natus sapiente eaque deleniti reiciendis sunt
                            explicabo consectetur quae sequi itaque maiores?
                            Impedit aspernatur eum animi provident! Perferendis
                            eveniet adipisci sequi quisquam?
                        </p>
                    </div>
                </div>
            </SectionTrigerScroll>
        </>
    )
}

export default TabHome
