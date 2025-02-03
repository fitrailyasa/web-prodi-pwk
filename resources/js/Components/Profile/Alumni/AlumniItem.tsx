import ControlCenterMac from '@/Components/ControlCenterMac'
import EmailIcon from '@/Components/Icon/EmialInco'
import InstagramIcon from '@/Components/Icon/InstagramInco'
import LinkedInIcon from '@/Components/Icon/LinkedInInco'
import WhatAppIcon from '@/Components/Icon/WhatAppInco'
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
                <ControlCenterMac />
                <div className="flex justify-start gap-5 pt-5">
                    <Image
                        src={data.image}
                        alt={data.image}
                        className="rounded-3xl aspect-square w-[200px] min-w-[200px] max-w-[100px]"
                    />
                    <div className=" flex flex-col">
                        <h3 className="font-bold text-3xl">{data.name}</h3>
                        <p className="pt-1">
                            {data.tahun_masuk} - {data.tahun_lulus}
                        </p>
                        <p className="uppercase font-semibold pt-3">
                            {data.bidang_industri}
                        </p>
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
                                <div className="flex gap-10  py-3">
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
                                            {data.tahun_masuk}
                                            {' - '}
                                            {data.tahun_lulus}
                                        </p>
                                        <div className="flex flex-wrap gap-3 pt-5">
                                            <div className="flex items-center gap-1">
                                                <EmailIcon
                                                    size={2}
                                                    className="text-main-green text-xs"
                                                />
                                                <span className="font-semibold">
                                                    {data.email}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-1">
                                                <WhatAppIcon
                                                    size={2}
                                                    className="text-main-green text-xs"
                                                />
                                                <span className="font-semibold">
                                                    {data.nomor_telepon}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-1">
                                                <InstagramIcon
                                                    size={2}
                                                    className="text-main-green text-xs"
                                                />
                                                <span className="font-semibold">
                                                    {data.instagram}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-1">
                                                <LinkedInIcon
                                                    size={2}
                                                    className="text-main-green text-xs"
                                                />
                                                <span className="font-semibold">
                                                    {data.linkedin}
                                                </span>
                                            </div>
                                        </div>
                                        {/* // description */}

                                        <div className="pt-10">
                                            <tr>
                                                <td className="font-bold text-nowrap">
                                                    Judul Penelitian
                                                </td>
                                                <td>
                                                    {' '}
                                                    :{' '}
                                                    <span className="text-wrap">
                                                        {data.judul_penelitian}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td className="font-bold text-nowrap">
                                                    Bidang kerja
                                                </td>
                                                <td>
                                                    {' '}
                                                    : {data.bidang_industri}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td className="font-bold text-nowrap">
                                                    Tempat kerja
                                                </td>
                                                <td>
                                                    {' '}
                                                    : {data.nama_perusahaan}
                                                </td>
                                            </tr>

                                            {/* <p>
                                                <span className="font-bold text-nowrap">
                                                    Judul Penelitian{' : '}
                                                </span>
                                                {data.judul_penelitian}
                                            </p>
                                            <p>
                                                <span className="font-bold">
                                                    Bidang kerja{' : '}
                                                </span>
                                                {data.bidang_industri}
                                            </p>
                                            <p>
                                                <span className="font-bold">
                                                    Tempat kerja{' : '}
                                                </span>
                                                {data.nama_perusahaan}
                                            </p> */}
                                        </div>
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
                            </ModalFooter>
                        </>
                    )}
                </ModalContent>
            </Modal>
        </>
    )
}

export default AlumniItem
