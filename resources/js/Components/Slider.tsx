import React, { useState } from 'react'
import { motion, AnimatePresence } from 'framer-motion'
import { wrap } from 'popmotion'

const variants = {
    enter: (direction: number) => ({
        x: direction > 0 ? 1000 : -1000,
        opacity: 0
    }),
    center: {
        zIndex: 1,
        x: 0,
        opacity: 1
    },
    exit: (direction: number) => ({
        zIndex: 0,
        x: direction < 0 ? 1000 : -1000,
        opacity: 0
    })
}

const swipeConfidenceThreshold = 10000
const swipePower = (offset: number, velocity: number) => {
    return Math.abs(offset) * velocity
}

interface SliderProps {
    children: React.ReactNode[]
}

export const Slider: React.FC<SliderProps> = ({ children }) => {
    const [[page, direction], setPage] = useState<[number, number]>([0, 0])

    const childIndex = wrap(0, children.length, page)

    const paginate = (newDirection: number) => {
        console.log('newDirection', newDirection)
        setPage([page + newDirection, newDirection])
    }

    return (
        <div className="relative z-10 w-full h-full overflow-hidden bg-gray-100">
            <AnimatePresence initial={false} custom={direction}>
                <motion.div
                    key={page}
                    custom={direction}
                    variants={variants}
                    initial="enter"
                    animate="center"
                    exit="exit"
                    transition={{
                        x: { type: 'spring', stiffness: 300, damping: 30 },
                        opacity: { duration: 0.2 }
                    }}
                    drag="x"
                    dragConstraints={{ left: 0, right: 0 }}
                    dragElastic={1}
                    onDragEnd={(e, { offset, velocity }) => {
                        const swipe = swipePower(offset.x, velocity.x)

                        if (swipe < -swipeConfidenceThreshold) {
                            paginate(1)
                        } else if (swipe > swipeConfidenceThreshold) {
                            paginate(-1)
                        }
                    }}
                    className="absolute w-full h-full"
                >
                    {children[childIndex]}
                </motion.div>
            </AnimatePresence>

            <div
                className="absolute z-20 top-1/2 left-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                onClick={() => paginate(-1)}
            >
                {'❮'}
            </div>
            <div
                className="absolute z-20 top-1/2 right-4 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md hover:bg-gray-200 focus:outline-none"
                onClick={() => paginate(1)}
            >
                {'❯'}
            </div>
        </div>
    )
}
