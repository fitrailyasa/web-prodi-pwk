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
} from '@heroui/react'

type AlumniItemProps = {
    data: AlumniItemTypes
}

const AlumniItem: React.FC<AlumniItemProps> = ({ data }) => {
    const { isOpen, onOpen, onOpenChange } = useDisclosure()
    return (
        <>
            <div
                onClick={onOpen}
                className="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-200 cursor-pointer overflow-hidden"
            >
                <div className="p-2">
                    <ControlCenterMac />
                </div>
                <div className="p-3">
                    <div className="flex flex-col items-center">
                        <Image
                            src={data.image}
                            alt={data.name}
                            className="rounded-xl aspect-square w-full object-cover h-32 md:h-48"
                        />
                        <div className="mt-2 md:mt-4 text-center">
                            <h3 className="font-bold text-base md:text-xl text-main-blue line-clamp-1">
                                {data.name}
                            </h3>
                            <p className="text-xs md:text-sm text-main-blue mt-0.5 md:mt-1">
                                {data.tahun_masuk} - {data.tahun_lulus}
                            </p>
                            <p className="text-main-blue font-medium mt-1 md:mt-2 text-xs md:text-sm line-clamp-2">
                                {data.posisi_pekerjaan}
                            </p>
                        </div>
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
                            <ModalBody className="px-6 py-4 overflow-hidden">
                                <div className="flex flex-col md:flex-row gap-6">
                                    <Image
                                        src={data.image}
                                        alt={data.name}
                                        className="rounded-xl aspect-square w-full md:w-[300px] object-cover"
                                    />
                                    <div className="flex-1">
                                        <h1 className="text-2xl font-bold text-main-blue">
                                            {data.name}
                                        </h1>
                                        <p className="text-gray-600">
                                            {data.tahun_masuk}
                                            {' - '}
                                            {data.tahun_lulus}
                                        </p>
                                        <div className="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                                            <div className="flex items-center gap-2">
                                                <EmailIcon
                                                    size={2}
                                                    className="text-main-green"
                                                />
                                                <span className="text-sm">
                                                    {data.email}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <WhatAppIcon
                                                    size={2}
                                                    className="text-main-green"
                                                />
                                                <span className="text-sm">
                                                    {data.nomor_telepon}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <InstagramIcon
                                                    size={2}
                                                    className="text-main-green"
                                                />
                                                <span className="text-sm">
                                                    {data.instagram}
                                                </span>
                                            </div>
                                            <div className="flex items-center gap-2">
                                                <LinkedInIcon
                                                    size={2}
                                                    className="text-main-green"
                                                />
                                                <span className="text-sm">
                                                    {data.linkedin}
                                                </span>
                                            </div>
                                        </div>

                                        <div className="mt-6 space-y-3">
                                            <div className="grid grid-cols-[120px,1fr] gap-2">
                                                <span className="font-semibold text-main-blue">
                                                    Judul Penelitian
                                                </span>
                                                <span>
                                                    : {data.judul_penelitian}
                                                </span>
                                            </div>
                                            <div className="grid grid-cols-[120px,1fr] gap-2">
                                                <span className="font-semibold text-main-blue">
                                                    Pekerjaan
                                                </span>
                                                <span>
                                                    : {data.posisi_pekerjaan}
                                                </span>
                                            </div>
                                            <div className="grid grid-cols-[120px,1fr] gap-2">
                                                <span className="font-semibold text-main-blue">
                                                    Tempat kerja
                                                </span>
                                                <span>
                                                    : {data.nama_perusahaan}
                                                </span>
                                            </div>
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
