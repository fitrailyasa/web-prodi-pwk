import ControlCenterMac from '@/Components/ControlCenterMac'
import EvenContainer from '@/Components/home/EvenContainer'
import ClaenderIcon from '@/Components/Icon/CalenderIcon'
import EyeIcon from '@/Components/Icon/EyeInco'
import ShareIcon from '@/Components/Icon/ShareInco'
import { DateFormater } from '@/Helper/DateFormater'
import { AlumniItemTypes } from '@/types'

import {
    Button,
    Image,
    Modal,
    ModalBody,
    ModalContent,
    ModalFooter,
    ModalHeader,
    useDisclosure
} from '@nextui-org/react'
import { data } from 'framer-motion/client'

type AlumniItemProps = {
    data: AlumniItemTypes
}

const AlumniItem: React.FC<AlumniItemProps> = ({ data }) => {
    const { isOpen, onOpen, onOpenChange } = useDisclosure()
    return (
        <>
            <div
                onClick={onOpen}
                className="bg-white p-5 rounded-3xl shadow-xl min-w-96"
            >
                <div className="flex justify-start gap-5">
                    <Image
                        src={data.image}
                        alt={data.image}
                        className="rounded-3xl aspect-square w-[300px] min-w-[300px] max-w-[100px]"
                    />
                    <div className=" flex flex-col">
                        <h3 className="font-bold text-3xl">{data.name}</h3>
                        <p>
                            {data.tahun_masuk} - {data.tahun_lulus}
                        </p>
                        <p>{data.email}</p>
                    </div>
                </div>
            </div>

            <Modal
                isOpen={isOpen}
                size="4xl"
                placement="bottom-center"
                onOpenChange={onOpenChange}
            >
                <ModalContent>
                    {onClose => (
                        <>
                            <ModalHeader>
                                <ControlCenterMac />
                            </ModalHeader>
                            <ModalBody className="px-10 py-4">
                                <div className="flex gap-3  py-3">
                                    <Image
                                        src={data.image}
                                        alt={data.image}
                                        className="rounded-3xl aspect-square w-[300px] min-w-[300px] max-w-[100px]"
                                    />
                                    <div className="">
                                        <h1 className="text-2xl font-bold">
                                            {data.name}
                                        </h1>
                                        <p>
                                            {data.tahun_masuk} -{' '}
                                            {data.tahun_lulus}
                                        </p>
                                        <p>{data.email}</p>
                                        <p>{data.nomor_telepon}</p>
                                        <p>{data.posisi_pekerjaan}</p>
                                        <p>
                                            {JSON.stringify(
                                                data.pengalaman_kerja
                                            )}
                                        </p>
                                        <p>{data.judul_penelitian}</p>
                                    </div>
                                </div>
                            </ModalBody>
                            <ModalFooter>
                                <Button
                                    className="bg-red-500 text-white font-semibold"
                                    onPress={onClose}
                                >
                                    Close
                                </Button>
                                {/* <Button className="bg-main-green flex gap-1 text-white font-semibold">
                                    Save to Calender
                                    <ShareIcon size={1} className="text-xl" />
                                </Button> */}
                            </ModalFooter>
                        </>
                    )}
                </ModalContent>
            </Modal>
        </>
    )
}

export default AlumniItem
