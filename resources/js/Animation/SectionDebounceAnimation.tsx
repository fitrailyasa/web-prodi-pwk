import React from 'react'
import { motion, Variants } from 'framer-motion'

interface BouncingAnimationProps {
    children: React.ReactNode
    className?: string
    index?: number
}

export const SectionTrigerScroll: React.FC<BouncingAnimationProps> = ({
    children,
    className,
    index
}) => {
    const variant: Variants = {
        offscreen: {
            opacity: 0,
            y: 50
        },
        onscreen: {
            opacity: 1,
            y: 0,
            transition: {
                delay: index ? index * 0.2 * 0.05 : 0.05,
                type: 'spring',
                bounce: 0.4,
                duration: 0.8
            }
        }
    }
    return (
        <motion.section
            className="card-container"
            initial="offscreen"
            whileInView="onscreen"
            viewport={{ once: true, amount: 0.8 }}
        >
            <motion.div className={className} variants={variant}>
                {children}
            </motion.div>
        </motion.section>
    )
}
